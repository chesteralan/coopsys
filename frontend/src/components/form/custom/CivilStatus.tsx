import Radio from "../input/Radio";
import { useMemberActions, useMemberCivilStatus } from "@/stores/memberStore";
import { CivilStatus as CivilStatusType } from "@/typing/member";

type GenderInputProps = {
  className?: string;
};

const STATUS = ["Single", "Married", "Separated", "Widowed"];

export default function CivilStatus({ className = "" }: GenderInputProps) {
  const selectedValue = useMemberCivilStatus();
  const { setCivilStatus } = useMemberActions();
  const handleRadioChange = (value: string) => {
    setCivilStatus(value as CivilStatusType);
  };

  return (
    <div className={`relative ${className}`}>
      <label
        htmlFor="civilStatus"
        className="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"
      >
        Civil Status
      </label>
      <div className="flex flex-wrap items-center gap-8">
        {STATUS.map((item: string, index: number) => (
          <Radio
            key={index}
            id={`civil-status-${index}`}
            name="civilStatus"
            value={item.toLowerCase()}
            checked={selectedValue === item.toLowerCase()}
            onChange={handleRadioChange}
            label={item}
          />
        ))}
      </div>
    </div>
  );
}
